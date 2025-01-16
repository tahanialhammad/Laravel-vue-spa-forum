import {formatDistance, parseISO} from "date-fns";

// const relativeDate = (date) => formatDistance(parseISO(date), new Date());
const relativeDate = (date) => formatDistance(parseISO(date), new Date(), { addSuffix: true }); //automaticly

export {
    relativeDate,
};